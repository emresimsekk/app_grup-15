'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  const department = sequelize.define('Department', {

    
    hospital_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    depName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "departments"
  });

  department.associate = (models) => {
    department.belongsTo(models.Hospital, {
      as: 'author',
      foreignKey: 'hospital_id'
    });

    department.hasMany(models.Doctor, {
      as: 'doctors',
      foreignKey: 'dep_id'
    });
  };

  return department;
};