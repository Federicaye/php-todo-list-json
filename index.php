<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
        integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
    <script src="js/app.js" type="module"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div id="app">
        <header class="d-flex justify-content-between align-items-center ">
            <h1 class="p-2">Used books</h1>
           <!--  <div class="d-flex align-items-center">
                <p>sell a used book</p>
                <input type="text" v-model="itemTitle">
                <button @click="sellBook">SELL</button>
            </div> -->
            <select name="" id="" v-model="genre" class="p-2 me-2 ">
                <option value="All">All genre</option>
                <option value="fantasy">Fantasy</option>
                <option value="romantic">Romantic Novel</option>
                <option value="science">Science Fiction</option>
            </select>
        </header>
        <main >
            <section class="d-flex ">
                <div class="sell">
                <p>sell a used book</p>
                <input type="text" v-model="itemTitle">
                <select name="" id="" v-model="genreSell" class="p-2 me-2 ">
                <option value="All">All genre</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Romantic Novel">Romantic Novel</option>
                <option value="Science Fiction">Science Fiction</option>
            </select>
                <button @click="sellBook">SELL</button>
                </div>
                <div class="books">
                    <div class="d-flex flex-wrap ps-4 ">
                        <div class="card m-2 " style="width: 18rem;" v-for="(book, index) in filteredBooks">
                            <img :src="book.img" class="card-img-top" :alt="book.title">
                            <div class="card-body">
                                <h5 class="card-title">{{book.title}}</h5>
                                <p class="card-text"> {{book.genre}}
                                </p>
                                <p v-if="book.soldout" class="soldout">Sold out</p>
                                <button class="btn btn-primary" @click.prevent="addToCart(book.id)"> add to
                                    cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart">
                    <div class="d-flex align-items-center">
                        <h3 class="me-2 ">Cart</h3><i class="fa-solid fa-cart-shopping"></i>
                    </div>

                    <ul>
                        <li v-for="(book,index) in cart" class="d-flex align-items-center">
                            <div>
                                <h5>{{book.title}}</h5>
                                <p>{{book.genre}}</p>
                            </div>

                            <i class="fa-solid fa-rectangle-xmark" @click="removeItem(book.id)"></i>
                        </li>
                    </ul>

                </div>
            </section>

        </main>
    </div>
</body>

</html>