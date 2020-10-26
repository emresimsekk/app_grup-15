'use strict';
module.exports = (sequelize, DataTypes) => {

  const userInfo = sequelize.define('Userinfo', {
    
    user_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    name: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    surname: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    actives: {
      type: DataTypes.INTEGER,
      allowNull: false,

    },
   
  }, {
    tableName: "userInfos"
  });


  userInfo.associate = (models) => {
    userInfo.belongsTo(models.User, {
      as: "User",
      foreignKey: 'id'
    });
  };

  return userInfo;
};