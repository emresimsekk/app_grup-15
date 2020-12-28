
const {
   
    User,Userinfo
} = require("../models/index");
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const authConfig = require('../../config/auth');
module.exports={


    async getUserInfo(req, res) {

         let user_id=req.body.user_id;
        await User.findAll({
            where:{ 
                id:user_id
            },
            include: [
                {
                    as: 'userinfos', 
                    model: Userinfo,
                },
            ]
        }).then(result=>{
            res.status(200).json({
                user:result
            });
        })
    },
    async update(req, res) {
        let user_id=req.body.user_id;
        

        User.findOne({
            where:{id:user_id}
        }).then(user=>{
            if (user) 
            {
                if (bcrypt.compareSync(req.body.lastPassword, user.password)) 
                {
                    
                    user.mail=req.body.mail; 
                    user.phone=req.body.phone; 
                    user.ask=req.body.ask; 
                   

                    user.save().then(info=>{ 
                        if(info)
                        {
                            Userinfo.findOne({
                                where:{user_id}
                            }).then(userInfo=>{
                                userInfo.name=req.body.name;
                                userInfo.surname=req.body.surname;
                                userInfo.save().then(result=>{
                                    res.json({state:0, msg:"Bilgiler Başarıyla Güncellendi"});
                                })

                            });  
                        }
                        

                    });

                } else {
                    res.json({state:1,msg:"Girilen şifreniz yanlış"});
                }
              
                
            }
            else 
            {
                //User yoksa
            }
        })

   },
   async updatePassword(req,res)
   {
    let user_id=req.body.user_id;
       User.findOne({where:{id:user_id}}).then(user=>{

        if (user) 
        {
            if (bcrypt.compareSync(req.body.lastPassword, user.password)) 
            {
                let password = bcrypt.hashSync(req.body.newPassword, Number.parseInt(authConfig.rounds));
                user.password=password; 
                user.save().then(info=>{ 
                    res.json({state:0,msg:"Şifreniz başarıyla güncellenmiştir."});
                });
                
            }
            else 
            {
                res.json({state:1,msg:"Girilen şifreniz yanlış"});
            }
        }


       })
   }
}