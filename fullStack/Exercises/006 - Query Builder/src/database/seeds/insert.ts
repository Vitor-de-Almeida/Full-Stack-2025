import { Knex } from "knex";

export async function seed(knex: Knex): Promise<void> {
    await knex("courses").del();
    await knex.raw("DELETE FROM sqlite_sequence WHERE name = 'courses'");
    // Inserts seed entries
    await knex("courses").insert([
        { name:"hardware engineering"},
        { name:"computer science"},
        { name:"data science"},
        { name:"cybersecurity"},
        { name:"artificial intelligence"},
        { name:"machine learning"},
        { name:"data engineering"},
        { name:"data analysis"},
        { name:"data visualization"},
        { name:"data mining"},
        { name:"database"},
        { name:"network"},
        { name:"operating system"},
        { name:"computer architecture"},
        { name:"computer network"},
        { name:"computer organization"},
        { name:"computer programming"},
        { name:"computer graphics"},
        { name:"computer security"},
        { name:"computer system"},
    ]);
};
