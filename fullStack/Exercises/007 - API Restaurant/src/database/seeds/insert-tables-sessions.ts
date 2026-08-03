import { Knex } from "knex";

export async function seed(knex: Knex): Promise<void> {
    await knex("tables_sessions").del();

    await knex("tables_sessions").insert([
        { table_id: 1, open_at: knex.fn.now(), close_at: null },
        { table_id: 2, open_at: knex.fn.now(), close_at: null },
        { table_id: 3, open_at: knex.fn.now(), close_at: knex.fn.now() },
        { table_id: 4, open_at: knex.fn.now(), close_at: null },
        { table_id: 5, open_at: knex.fn.now(), close_at: null },
    ]);
}
