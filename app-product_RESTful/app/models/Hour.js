'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  const hour = sequelize.define('Hour', {

    
    doctor_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    hourName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "hours"
  });

  hour.associate = (models) => {
    hour.belongsTo(models.Doctor, {
      as: 'doctors',
      foreignKey: 'id'
    });
    
    hour.hasMany(models.Apppointment, {
      as: 'appointments',
      foreignKey: 'id'
    });
  };

  return hour;
};