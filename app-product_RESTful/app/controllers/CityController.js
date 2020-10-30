const {
    City
} = require("../models/index");

module.exports = {

    async getCityAll(req, res ) {

        let city = await City.findAll();
        res.json(city);
    },
};