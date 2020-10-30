const {
   
    Department
} = require("../models/index");

module.exports = {

    async getDepartmentAll(req, res) {

        await Department.findAll({
            where: {
                hospital_id: req.query.hospital_id
            }
        }).then(department => {
            if (!Object.entries(department).length) {

                res.status(404).json({
                    msg: "İçerik bulunamadı."
                });

            } else {
                res.json(department);
            }
        });
    },
};