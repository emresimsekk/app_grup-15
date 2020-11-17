
const {
   
    User,Userinfo
} = require("../models/index");

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
    }
}