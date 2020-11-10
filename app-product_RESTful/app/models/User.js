'use strict';
module.exports = (sequelize, DataTypes) => {

  const users = sequelize.define('User', {


    mail: {
      type: DataTypes.STRING,
      unique: true,
      allowNull: false,
    },
    password: {
      type: DataTypes.STRING,
      allowNull: false
    }

  }, {
    tableName: "users"
  });


  users.associate = (models) => {

    users.belongsTo(models.Userinfo, {
      as: 'userinfos',
      foreignKey: 'id'
    });

    users.hasMany(models.Product, {
      as: 'products',
      foreignKey: 'user_id'
    });
    users.hasMany(models.Apppointment, {
      as: 'apppointments',
      foreignKey: 'user_id'
    });

    users.belongsTo(models.UserRole, {
      as: 'userRoles',
      foreignKey:'id'
    });

  };

  users.isAdmin = function(roles) {
    let tmpArray = [];
    roles.forEach(role => tmpArray.push(role.role));

    return tmpArray.includes('Admin');
  }
  
  return users;

};