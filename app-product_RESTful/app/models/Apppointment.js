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
    date_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    doctor_id:{
      allowNull: false,
      type: DataTypes.INTEGER,
    },
    dep_id:{
      allowNull: false,
      type: DataTypes.INTEGER,
    
    },
    hospital_id:{
      allowNull: false,
      type: DataTypes.INTEGER,
 
    },
    district_id:{
      allowNull: false,
      type: DataTypes.INTEGER,
 
    },
    city_id:{
      allowNull: false,
      type: DataTypes.INTEGER,
     
    },
    actives:{
      type: DataTypes.BOOLEAN,
    }
    
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
      foreignKey: 'hour_id'
    });

    apppoint.belongsTo(models.Date, {
      as: 'dates',
      foreignKey: 'date_id'
    });

    apppoint.belongsTo(models.Doctor, {
      as: 'doctors',
      foreignKey: 'doctor_id'
    });

    apppoint.belongsTo(models.Department, {
      as: 'departments',
      foreignKey: 'dep_id'
    });

    apppoint.belongsTo(models.Hospital, {
      as: 'hospitals',
      foreignKey: 'hospital_id'
    });
    apppoint.belongsTo(models.District, {
      as: 'districts',
      foreignKey: 'district_id'
    });
    apppoint.belongsTo(models.City, {
      as: 'citys',
      foreignKey: 'city_id'
    });

   
  };

  
  return apppoint;
};