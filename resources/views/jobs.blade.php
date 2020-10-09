@extends('layouts.main')

@section('content')

    @include('partials.navbar')

    <div id="search-dev" style="padding-top: 120px;">
    
        <div class="container-fluid">

            <div class="row" v-cloak >   
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>Búsqueda</h4>
                            <div class="form-group">
                                <label for="search">Búsqueda</label>  
                                <input type="text" class="form-control" id="search" v-model="jobSearch">
                            </div>
                            <div class="form-group">
                                <label for="region">Región</label>  
                                <select class="form-control" id="region" v-model="regionSearch">
                                    <option value="">Seleccione</option>
                                    <option :value="region.id" v-for="region in regions">@{{ region.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Categoría</label>  
                                <select class="form-control" id="category">
                                    <option value="">Seleccione</option>
                                    <option :value="jobCategory.id" v-for="jobCategory in categories">@{{ jobCategory.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="business">Empresa</label>  
                                <input type="text" class="form-control" id="business">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-success" @click="query()">buscar</button>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="col-12" v-for="offer in offers">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <p class="text-center">
                                            <img class="round-img" :src="offer.user.image" alt="Card image" style="width: 60px;">
                                        </p>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title">@{{ offer.job_position }}</h5>
                                        <p class="text-b">@{{ offer.user.business_name }}</p>
                                        <p class="price-op">
                                            $ @{{ parseInt(offer.min_wage).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }} <span v-if="offer.max_wage != null">- $ @{{ parseInt(offer.max_wage).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</span>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text text-center">@{{ offer.title }}</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-right">
                                            <a :href="'{{ env('PLATFORM_URL') }}'+'/offers/detail/'+offer.slug" class="btn btn-primary">Ver más</a>
                                        </p>
                                    </div>
                                
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

                <div class="col-md-3">
                    <img style="width: 100%;" class="publicidad" src="{{ asset('assets/img/Banner-Epson-Movil.jpg') }}" alt="publicidad">
                    <img style="width: 100%;" class="publicidad" src="{{ asset('assets/img/Banner-Epson-Movil.jpg') }}" alt="publicidad">
                </div>
                
            </div>

            {{----}}

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
                    offers:[],
                    regions:[],
                    categories:[],
                    page:1,
                    pages:0
                }
            },
            methods: {

                /*async jobs(){

                    let offersRes = await axios.post("{{ url('/jobs') }}", {page: this.page})
                    if(offersRes.data.success == true){

                        this.offers = offersRes.data.offers
                        this.pages = Math.ceil(offersRes.data.offersCount / offersRes.data.dataAmount)
                        
                    }

                },*/
                fetchRegions(){

                    axios.get("{{ url('/regions/all') }}").then(res => {

                        this.regions = res.data.regions

                    })

                },
                fetchCategories(){

                    axios.get("{{ url('/job-categories/all') }}").then(res => {

                        this.categories = res.data.categories

                    })

                },
                async query(){

                    let offersRes = await axios.post("{{ url('/search') }}", {job_search: this.search, region_id: this.regionSearch, page: this.page})
                    if(offersRes.data.success == true){

                        this.offers = offersRes.data.offers
                        this.pages = Math.ceil(offersRes.data.offersCount / offersRes.data.dataAmount)
                        
                    }

                },

            },
            created(){
                
                //this.jobs()
                this.fetchRegions()
                this.fetchCategories()

                this.jobSearch = localStorage.getItem("encontre_trabajo_job_search")
                this.regionSearch = localStorage.getItem("encontre_trabajo_region_search")
                this.query()
                
            }

        })
    </script>

@endpush