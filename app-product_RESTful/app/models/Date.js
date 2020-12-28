'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  const date = sequelize.define('Date', {

    
    doctor_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    dateName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "dates"
  });

  date.associate = (models) => {
    date.belongsTo(models.Doctor, {
      as: 'author',
      foreignKey: 'doctor_id'
    });

    date.hasMany(models.Hour, {
      as: 'hours',
      foreignKey: 'id'
    });
  };

  return date;
};