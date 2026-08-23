import { Knex } from "knex";

export async function seed(knex: Knex): Promise<void> {
    // Deletes ALL existing entries
    await knex("products").del();

    // Inserts seed entries
    await knex("products").insert([
        { name: "Porks Portion", price: 11.00 },
        { name: "Porks Fillet", price: 13.00 },
        { name: "Fries", price: 15.00 },
        { name: "Soda", price: 2.00 },
        { name: "Beer", price: 3.00 },
        { name: "Wine", price: 4.00 },
        { name: "Water", price: 1.00 },
        { name: "Cola", price: 2.00 },
        { name: "Fanta", price: 2.00 },
        { name: "Sprite", price: 2.00 },
        { name: "7Up", price: 2.00 },
        { name: "Ice Tea", price: 2.00 },
        { name: "Ice Coffee", price: 2.00 },
        { name: "Ice Cream", price: 2.00 },
    ]);
};
