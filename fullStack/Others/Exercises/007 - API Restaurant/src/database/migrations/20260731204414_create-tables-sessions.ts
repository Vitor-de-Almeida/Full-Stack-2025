import type { Knex } from "knex";


export async function up(knex: Knex): Promise<void> {
    await knex.schema.createTable("tables_sessions", (table) => {
        table.increments("id").primary(),
        table.integer("table_id").notNullable().references("id").inTable("tables"),
        table.timestamp("open_at").notNullable().defaultTo(knex.fn.now()),
        table.timestamp("close_at").nullable()
    })
}


export async function down(knex: Knex): Promise<void> {
}

