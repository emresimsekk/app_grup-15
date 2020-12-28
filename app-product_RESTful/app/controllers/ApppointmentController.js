const {
    Apppointment,Hour,Date,Doctor,Department,Hospital,District,City,
} = require('../models/index');

module.exports = {
    addApppoint(req, res) {
        Apppointment.create({
            user_id: req.body.user_id,
            hour_id: req.body.hour_id,
            date_id: req.body.date_id,
            doctor_id:req.body.doctor_id,
            dep_id:req.body.dep_id,
            hospital_id:req.body.hospital_id,
            district_id:req.body.district_id,
            city_id:req.body.city_id,
            actives:1
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
                actives:1
            }, include: [
                {
                    as: 'hours',
                    model: Hour,
                },
                {
                    as: 'dates',
                    model: Date,
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

    },

    async history(req,res){
        await Apppointment.findAll({
            where: {
                user_id: req.body.user_id,
                actives:0
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

    },
    updateApp(req, res) {
        Apppointment.update({
           actives:0
        },
        {
            where:{
                user_id: req.body.user_id,
                id:req.body.id
            }
        }
        
        )
        .then(result=>{
            res.json({
                state: 1,
                result: result,
            });
        })


    },
    updateActiveApp(req, res) {
        Apppointment.update({
           actives:1
        },
        {
            where:{
                user_id: req.body.user_id,
                id:req.body.id
            }
        }
        
        )
        .then(result=>{
            res.json({
                state: 1,
                result: result,
            });
        })


    },
}