@extends('layouts.main')

@section('content')

    @include('partials.navbar')

    <div id="search-dev" style="padding-top: 120px;">
    
        <div class="container">

            <div class="row" v-cloak >   
                <div class="col-12">
                    <h3 v-if="jobSearch"><strong>Resultados de: </strong>@{{ jobSearch }}</h3>
                </div>

                <div class="col-12" v-if="offers.length == 0">
                    <h3 class="text-center">No hay trabajos para tus criterios de búsqueda</h3>
                </div>

                <div class="col-md-4" v-for="offer in offers">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center price-op" v-if="offer.wage_type == 1">
                                $ @{{ parseInt(offer.min_wage).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}
                            </p>
                            <p class="text-center price-op" v-else>
                                A convenir
                            </p>
                            <p class="text-center">
                                <img class="round-img" :src="offer.user.image" alt="Card image">
                            </p>
                            <p class="text-center text-b">@{{ offer.user.business_name }}</p>
                            <h5 class="card-title text-center">@{{ offer.job_position }}</h5>
                            <p class="card-text text-center">@{{ offer.title }}</p>
                            
                            <p class="text-center">
                                <a :href="'{{ env('PLATFORM_URL') }}'+'/offers/detail/'+offer.slug" class="btn btn-primary">Ver más</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-cloak>
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" v-if="page > 1">
                                <a class="page-link" href="#" aria-label="Previous" @click="fetch(page -1)">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li v-for="index in pages" class="page-item" v-if="page == index && index >= page - 3 &&  index < page + 3"><a class="page-link" href="#" @click="fetch(index)">@{{ index }}</a></li>
                            <li class="page-item" v-if="page < pages">
                                <a class="page-link" href="#" aria-label="Next" @click="fetch(page + 3)">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>    
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

    </div>

@endsection

@push("scripts")

    <script>
        const devArea = new Vue({
            el: '#search-dev',
            data() {
                return {
                    jobSearch:"",
                    regionSearch:"",
                    communeSearch:"",
                    offers:[],
                    page:1,
                    pages:0
                }
            },
            methods: {

                async communeQuery(){

                    let offersRes = await axios.post("{{ url('/search/commune') }}", {communeSearch: this.communeSearch, page: this.page})
                    if(offersRes.data.success == true){

                        this.offers = offersRes.data.offers
                        this.pages = Math.ceil(offersRes.data.offersCount / offersRes.data.dataAmount)
                        
                    }

                },

            },
            created(){
                
                this.communeSearch = localStorage.getItem("encontre_trabajo_commune_search")
                this.communeQuery()
                
                
            }

        })
    </script>

@endpush