const {
   
    Doctor
} = require("../models/index");

module.exports = {

    async getDoctorAll(req, res) {

        await Doctor.findAll({
            where: {
                dep_id: req.query.dep_id
            }
        }).then(doctor => {
            if (!Object.entries(doctor).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(doctor);
            }
        });
    },
};