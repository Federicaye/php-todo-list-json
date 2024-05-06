const { createApp } = Vue;
createApp({
    data() {
        return {
            books: [],
            cart: [],
            genre: "",
            itemTitle: ""
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
                genre: '',
                img: 'img/book.jpg',
                soldout: false
            }
            this.books.push(newBook);
            let nextId = 0;
            this.books.forEach((el) => {
                if (nextId < el.id) {
                    nextId = el.id
                }
            })
            newBook.id = nextId;
        },
        getData() {
            axios.get('server.php').then((res)=> {
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