const {
    User,
    Userinfo,
    UserRole
} = require('../models/index');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const authConfig = require('../../config/auth');

module.exports = {
    signIn(req, res) {
        let {
            mail,
            password
        } = req.body;
        User.findOne({
            where: {
                mail: mail
            }
        }).then(user => {
            if (!user) {
                res.status(404).json({
                    msg: "Bu mail adresine ait kullanıcı bulunamadı!"
                });
            } else {
                if (bcrypt.compareSync(password, user.password)) {

                    let token = jwt.sign({
                        user: user
                    }, authConfig.secret, {
                        expiresIn: authConfig.expires
                    });
                    res.json({
                        user: user,
                        token: token
                    });
                } else {
                    res.status(401).json({
                        msg: "Şifre yanlış"
                    });
                }
            }

        }).catch(err => {
            res.status(500).json(err)
        });

    },

    signUp(req, res) {

        let password = bcrypt.hashSync(req.body.password, Number.parseInt(authConfig.rounds));
        User.create({
            mail: req.body.mail,
            password: password

        }).then(user => {
            Userinfo.create({
                user_id: user.id,
                name: req.body.name,
                surname: req.body.surname,
                actives: req.body.actives,


            }).then(user => {

                UserRole.create({
                    user_id: user.id,
                    role_id: 1
                }).then(user => {

                    let token = jwt.sign({
                        user: user
                    }, authConfig.secret, {
                        expiresIn: authConfig.expires
                    });
                    res.json({
                        user: user,
                        token: token
                    });

                }).catch(err => {
                    res.status(500).json({
                        state: 0,
                        err
                    });
                });

            }).catch(err => {
                res.status(500).json({
                    state: 0,
                    err
                });
            });

        }).catch(err => {
            res.status(500).json({
                state: 0,
                err
            });
        });



    }

}