<!-- Show all books -->

<div class="container-fluid bg-light pt-45 pt-lg-115 pb-50 pb-lg-70 h-100" id="all-books">
    <div class="container books-container bg-light pt-15 px-lg-115">
        <div class="d-flex flex-column flex-lg-row mb-35 mb-lg-70 justify-content-between">
            <h1 class="font-primary">Nos livres à l'échange</h1>
            <form 
                class="input-group rounded search position-relative mt-35 mt-lg-0"
                action="index.php?action=books"
                method="post"
                >
                <?php include('img/icons/search.svg')?>
                <input 
                    type="search" 
                    name="search"
                    class="form-control rounded ps-40" 
                    placeholder="Rechercher un livre" 
                    aria-label="Search" 
                    aria-describedby="search-addon" 
                    />
            </form>
        </div>
        <?php if (is_null($books)) { ?>
            <p class="text-center font-secondary">Aucun livre ne correspond à votre recherche.</p>
        <?php } else { 
            include('views/partials/booksTable.php');
        }?>
        </div>
    <div>
</div>
