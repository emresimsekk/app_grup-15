'use strict';
module.exports = {
  up: async (queryInterface, Sequelize) => {
    await queryInterface.createTable('apppointments', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      user_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "users",
          key: "id"
        },
        onDelete: "CASCADE"
       },
      hour_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "hours",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      date_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "dates",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      doctor_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "doctors",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      dep_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "departments",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      hospital_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "hospitals",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      district_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "districts",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      city_id:{
        allowNull: false,
        type: Sequelize.INTEGER,
        referances: {
          model: "citys",
          key: "id"
        },
        onDelete: "CASCADE"
      },
      actives:{
        allowNull: false,
        type: Sequelize.BOOLEAN,
        
      },
     
      createdAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      updatedAt: {
        allowNull: false,
        type: Sequelize.DATE
      }
    });
  },
  down: async (queryInterface, Sequelize) => {
    await queryInterface.dropTable('apppointments');
  }
};