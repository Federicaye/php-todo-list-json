const { createApp } = Vue;
createApp({
    data() {
        return {
            books: [],
            cart: [],
            genre: "",
            itemTitle: "",
            genreSell: "",
            nextId: 0


        }
    },
    methods: {
        addToCart(id) {
            /* event.preventDefault(); */
            const item = this.books.find((el) => { return el.id === id });
            item.soldout = !item.soldout;
            this.cart.push(item);
            console.log(this.cart);
            console.log(item)

        },
        removeItem(id) {
            const i = this.cart.findIndex((el) => el.id === id);
            const bookCart = this.books.find((el) => { return el.id === id });
            if (i !== -1) {
                this.cart.splice(i, 1);
                bookCart.soldout = !bookCart.soldout;
            }
        },
        sellBook() {
            
            const newBook = {
                id: null,
                title: this.itemTitle,
                genre: this.genreSell,
                img: 'img/book.jpg',
                soldout: false
            }
            this.books.push(newBook);
            this.books.forEach((el) => {
                if (this.nextId < el.id) {
                    this.nextId = el.id
                }
            })

            newBook.id = this.nextId++;

            const data = new FormData();
            data.append('title', this.itemTitle);
            data.append('genre', this.genreSell);
            data.append('img', 'img/book.jpg');
            data.append('id', this.nextId);
            data.append('soldout', false);
            axios.post('server.php', data).then((res) => {
                console.log(res.data);
            })
        },
        getData() {
            axios.get('server.php').then((res) => {
                this.books = res.data;
                console.log(this.books);
            })
        }
    },
    computed: {
        filteredBooks() {
            return this.books.filter((el) => {
                if (this.genre === "All" || !this.genre) {
                    return true
                } else if (this.genre === "fantasy") {
                    return el.genre === "Fantasy"
                } else if (this.genre === "romantic") {
                    return el.genre === "Romantic Novel"
                } else {
                    return el.genre === "Science Fiction"
                }
            })
        }

    },
    mounted() {
        this.getData();
    }
}).mount('#app')