const {
    City,
    District
} = require("../models/index");

module.exports = {

    async getDistrictAll(req, res) {

        await District.findAll({
            where: {
                city_id: req.query.city_id
            }
        }).then(district => {
            if (!Object.entries(district).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(district);
            }
        });
    },
};