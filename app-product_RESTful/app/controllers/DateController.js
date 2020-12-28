const {
   
    Date
} = require("../models/index");

module.exports = {

    async getDateAll(req, res) {

        await Date.findAll({
            where: {
                doctor_id: req.query.doctor_id
            }
        }).then(date => {
            if (!Object.entries(date).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(date);
            }
        });
    },
};