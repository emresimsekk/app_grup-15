const {
    Apppointment,Hour,Doctor,Department,Hospital,District,City,
} = require('../models/index');

module.exports = {
    addApppoint(req, res) {
        Apppointment.create({
            user_id: req.body.user_id,
            hour_id: req.body.hour_id
        }).then(app => {

            res.json({
                state: 1,
                apppointment: app,
            });
        }).catch(err => {
            res.status(500).json({
                state: 0,
                err
            });
        });


    },
    async listApppoint(req,res){
        await Apppointment.findAll({
            where: {
                user_id: req.body.user_id,
            }, include: [
                {
                 
                    as: 'hours',
                  
                    model: Hour,
                   
                },
                { 
                    as: 'doctors',
                  
                    model: Doctor,
               
                },
                { 
                    as: 'departments',
                  
                    model: Department,
               
                },
                { 
                    as: 'hospitals',
                  
                    model: Hospital,
               
                },
                { 
                    as: 'districts',
                  
                    model: District,
               
                },
                { 
                    as: 'citys',
                  
                    model: City,
               
                }
            ]

        }).then(result => {
            res.json(result);
        });

    }
}