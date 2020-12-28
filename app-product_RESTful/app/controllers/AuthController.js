const {
    User,
    Userinfo,
    UserRole,

} = require('../models/index');
const nodemailer = require('nodemailer');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const authConfig = require('../../config/auth');
const { update } = require('../policies/ProductPolicy');


module.exports = {
    signIn(req, res) {
        let {
            username,
            password
        } = req.body;
      User.findOne({where: { mail:username }}).then(user=>{
            if(user)
            {
                //Mail var ise
               if (bcrypt.compareSync(password, user.password)) {

                    let token = jwt.sign({
                        user: user
                    }, authConfig.secret, {
                        expiresIn: authConfig.expires
                    });
                    res.json({
                        state:2,
                        user: user,
                        token: token
                    });
                }
                else {
                    res.status(401).json({
                        state:1,
                        msg: "Şifre yanlış !"
                    });
                }
            }
            else
            {
                User.findOne({where:{phone:username}}).then(user=>{
                    if(user)
                    {
                        //Telefon var ise
                        if (bcrypt.compareSync(password, user.password)) {

                            let token = jwt.sign({
                                user: user
                            }, authConfig.secret, {
                                expiresIn: authConfig.expires
                            });
                            res.json({
                                state:2,
                                user: user,
                                token: token
                            });
                        }
                        else {
                            res.status(401).json({
                                state:1,
                                msg: "Şifre yanlış !"
                            });
                        }
                    }
                    else {
                        res.json({msg:"Böyle bir kullanıcı bulunamadı ! "});
                    }
                })

            }

        })



    },

    signUp(req, res) {

        let password = bcrypt.hashSync(req.body.password, Number.parseInt(authConfig.rounds));
        User.create({
            mail: req.body.mail,
            password: password,
            phone:req.body.phone,
            ask:req.body.ask

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
                        state:2,
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



    },
    async forgot(req,res)
    {
       const number=Math.floor(Math.random() * 10000000);

        await User.findOne( {
            where:{
                mail:req.body.mail,
                ask:req.body.ask
            }
        }).then(user=>{
            if (user) {
                user.random=number;
                user.save().then(result=>{ 
                    if(result)
                    {
                        
                        let transporter = nodemailer.createTransport({
                            host: "smtp.gmail.com",
                            port: 587,
                            secure: false, // true for 465, false for other ports
                            auth: {
                            user: "emresimsek801@gmail.com", // generated ethereal user
                            pass: "ASQW.Rg15a42", // generated ethereal password
                            },
                        });
                   
                        transporter.sendMail({
                            from: 'E-Randevu Şifre Değiştirme', // sender address
                            to:req.body.mail, // list of receivers
                            subject: "E-Randevu Şifre Değiştirme", // Subject line
                            text: "Şifre Güncelleme Linki http://localhost/App_Product/password/"+number+"/"+user.id , // plain text body
                            
                        }).then(mail=>{
                            res.json({state:0,msg:"Başarıyla mail gönderildi."})
                        })
                    }
                   
                });
                
            }
            else {
                res.json({state:1,msg:"Sistemde bu bilgilere ait kullanıcı bulunamadı !"})
            }
           
        })


    },
    async update(req,res)
    {
        User.findOne({
            where:{
                id:req.body.id,
                random:req.body.random
            }
        }).then(user=>{
            
            if(user)
            {    
                let password = bcrypt.hashSync(req.body.password, Number.parseInt(authConfig.rounds));
                user.password=password;
                user.save().then(result=>{
                    if(result)
                    {
                        res.json({state:0,msg:"Şifreniz başarıyla güncellendi."})
                    }
                })

            }
            else {
                res.json({state:1,msg:"Kullanıcılara ait bilgi bulunamadı !"})
            }
        
        })

    }


}