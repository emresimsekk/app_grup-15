const {
   
    Hour
} = require("../models/index");

module.exports = {

    async getHourAll(req, res) {

        await Hour.findAll({
            where: {
                doctor_id: req.query.doctor_id
            }
        }).then(hour => {
            if (!Object.entries(hour).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(hour);
            }
        });
    },
};