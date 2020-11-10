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