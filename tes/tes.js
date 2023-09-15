const a = () => {
    const user = {
        [0] : {
            name : "ata",
            bulan : "januari",
            hari : "senin"
        },
        [1] : {
            name : "jamal",
            bulan : "september",
            hari : "selasa"
        },
        [2] : {
            name : "ata",
            bulan : "januari",
            hari : "senin"
        }
    }
    b(user)
}

const b = (user) => {
    console.log(user[0].name)
}


// const a = () => {
//     const name = "ata";
//     const bulan = "januari";
//     b(name, hari)
//     const hari = "senin"
// }

// const b = (tes1, tes2, tes3) => {
//     console.log(tes1)
// }