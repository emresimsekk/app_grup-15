'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  const hour = sequelize.define('Hour', {

    
    date_id: {
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
    hour.belongsTo(models.Date, {
      as: 'dates',
      foreignKey: 'id'
    });
    
    hour.hasMany(models.Apppointment, {
      as: 'appointments',
      foreignKey: 'id'
    });
  };

  return hour;
};