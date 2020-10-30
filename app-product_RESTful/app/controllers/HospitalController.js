const {
   
    Hospital
} = require("../models/index");

module.exports = {

    async getHospitalAll(req, res) {

        await Hospital.findAll({
            where: {
                district_id: req.query.district_id
            }
        }).then(hospital => {
            if (!Object.entries(hospital).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(hospital);
            }
        });
    },
};