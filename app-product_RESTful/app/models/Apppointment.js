'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {

  const apppoint = sequelize.define('Apppointment', {
    user_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    hour_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    
  }, {
    tableName: "apppointments"
  });

  apppoint.associate = (models) => {
    
    apppoint.belongsTo(models.User, {
      as: 'users',
      foreignKey: 'id'
    });
    apppoint.belongsTo(models.Hour, {
      as: 'hours',
      foreignKey: 'id'
    });

    apppoint.belongsTo(models.Doctor, {
      as: 'doctors',
      foreignKey: 'id'
    });

    apppoint.belongsTo(models.Department, {
      as: 'departments',
      foreignKey: 'id'
    });

    apppoint.belongsTo(models.Hospital, {
      as: 'hospitals',
      foreignKey: 'id'
    });
    apppoint.belongsTo(models.District, {
      as: 'districts',
      foreignKey: 'id'
    });
    apppoint.belongsTo(models.City, {
      as: 'citys',
      foreignKey: 'id'
    });

   
  };

  
  return apppoint;
};