const {
    Product
} = require("../models/index");

module.exports = {

    async find(req, res, next) {
        let product = await Product.findByPk(req.params.id);

        if (!product) {
            res.status(404).json({
                msg: "Gönderi Bulunamadı."
            });
        } else {
            req.product = product;
            next();
        }
    },
    async index(req, res) {
        let products = await Product.findAll();
        res.json(products);

    },

    async show(req, res) {
        res.json(req.product);
    },

    async update(req, res) {
        req.Product.title = req.body.title;
        req.Product.body = req.body.body;

        req.Product.save().then(product => {
            res.json(product);
        });

    },
    async delete(req, res) {
        req.Product.destroy().then(product => {
            res.json({
                msg: "Ürün silindi."
            });
        });

    }
}