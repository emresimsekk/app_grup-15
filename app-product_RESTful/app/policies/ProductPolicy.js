const { User } = require('../models/index');

module.exports = {

    show(req, res, next) {
        if(req.user.id === req.product.user_id || User.isAdmin(req.user.roles)) {
            next();
        } else {
            res.status(401).json({ msg: "Yetkli Bulunmamaktadır." });
        }
    },

    update(req, res, next) {
        if(req.user.id === req.product.user_id  || User.isAdmin(req.user.roles)) {
            next();
        } else {
            res.status(401).json({ msg: "Yetkli Bulunmamaktadır." });
        }
    },

    delete(req, res, next) {
        if(req.user.id === req.product.user_id  || User.isAdmin(req.user.roles)) {
            next();
        } else {
            res.status(401).json({ msg: "Yetkli Bulunmamaktadır." });
        }
    }

}