'use strict';
module.exports = {
  up: async (queryInterface, Sequelize) => {
    await queryInterface.createTable('UserInfo', {
      id: {
        type: Sequelize.INTEGER,
        primaryKey: true,
        autoIncrement: true,
        allowNull: false,
      },
      user_id: {
        type: Sequelize.INTEGER,
        referances: {
          model: "User",
          key: "id"
        },
        onDelete: "CASCADE"
      },

      name: {
        type: Sequelize.STRING(50),
        allowNull: false,
      },
      surname: {
        type: Sequelize.STRING(50),
        allowNull: false,
      },
      actives: {
        type: Sequelize.INTEGER,
        allowNull: false,
      },

      createdAt: {
        type: Sequelize.DATE,
        allowNull: false,
      },
      updatedAt: {
        type: Sequelize.DATE,
        allowNull: false,
      }
    });
  },
  down: async (queryInterface, Sequelize) => {
    await queryInterface.dropTable('UserInfo');
  }
};