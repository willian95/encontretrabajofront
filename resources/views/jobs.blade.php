@extends('layouts.main')

@push("css")

    <style>
        #description p{
            text-align: left !important;
        }

        #description ul{
            list-style: unset !important;
            padding: revert;
        }
    </style>

@endpush

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
                                <select class="form-control" id="category" v-model="category">
                                    <option value="">Seleccione</option>
                                    <option :value="jobCategory.id" v-for="jobCategory in categories">@{{ jobCategory.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="business">Empresa</label>  
                                <input type="text" class="form-control" id="business" v-model="business">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-success" @click="query()">buscar</button>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">

                    <div class="col-md-12" v-if="loading == true">
                        <p class="text-center">
                            Buscando resultados
                        </p>
                    </div>

                    <div class="col-md-12" v-if="loading == false && offers.length == 0">
                        <p class="text-center">
                            No se encontraron resultados
                        </p>
                    </div>

                    <div class="col-12" v-for="offer in offers" style="margin-bottom: 1rem; padding-right: 2rem; padding-left: 2rem;">
                        <div class="card" data-toggle="modal" data-target="#jobModal" style="cursor: pointer;" @click="show(offer)">
                            <div class="card-body" style="padding: 0.6rem !important">
                                <div class="row">
                                    <div class="col-3">
                                        <p class="text-center">
                                            <img class="round-img" :src="offer.user.image" alt="Card image" style="width: 75px;">
                                        </p>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title">@{{ offer.job_position }}</h5>
                                        <small class="text-b">@{{ offer.user.region.name }}, @{{ offer.user.commune.name }}</small>
                                        <p class="price-op" v-if="offer.wage_type == 1">
                                            $ @{{ parseInt(offer.min_wage).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}
                                        </p>
                                        <p class="price-op" v-else>
                                            A convenir
                                        </p>
                                        <p v-if="offer.is_highlighted == 1">
                                            <strong>Aviso destacado</strong>
                                        </p>
                                        {{--<p>
                                            @{{ offer.description.substring(0, 60) }}
                                            <span v-if="offer.description.length > 60">
                                                ...
                                            </span>
                                        </p>--}}
                                    </div>
                                    {{--<div class="col-12">
                                        <p class="text-right">
                                            <a :href="'{{ env('PLATFORM_URL') }}'+'/offers/detail/'+offer.slug" class="btn btn-primary">Ver más</a>
                                        </p>
                                    </div>--}}
                                
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" v-cloak>
                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item" v-if="page > 1">
                                        <a class="page-link" href="#" aria-label="Previous" @click="query(page -1)">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li v-for="index in pages" class="page-item" v-if="page == index && index >= page - 3 &&  index < page + 3"><a class="page-link" href="#" @click="query(index)">@{{ index }}</a></li>
                                    <li class="page-item" v-if="page < pages">
                                        <a class="page-link" href="#" aria-label="Next" @click="query(page + 3)">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>    
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">
                    <img style="width: 100%;" class="publicidad" src="{{ asset('assets/img/Banner-Epson-Movil.jpg') }}" alt="publicidad">
                    <img style="width: 100%;" class="publicidad" src="{{ asset('assets/img/Banner-Epson-Movil.jpg') }}" alt="publicidad">
                </div>
                
            </div>

            <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <img :src="image" alt="" style="width: 120px">
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="price-op" v-if="wageType == 1">
                                        $ @{{ parseInt(minWage).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}
                                    </p>
                                    <p class="price-op" v-else>
                                        A convenir
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p>
                                        <strong>Titulo: </strong> @{{ title }}
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p>
                                        <strong>Categoría: </strong> @{{ category }}
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p>
                                        <strong>Puesto: </strong> @{{ jobPosition }}
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p>
                                        <strong>Descripción: </strong> 
                                    </p>
                                    <div v-html="description" id="description"> </div>
                                </div>
                                <div class="col-12">
                                    <p class="text-center">
                                        <a :href="'{{ env('PLATFORM_URL') }}'+'/offers/detail/'+slug" class="btn btn-primary">Postular </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
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
                    offers:[],
                    regions:[],
                    categories:[],  
                    category:"",
                    business:"",
                    page:1,
                    pages:0,
                    image:"",
                    title:"",
                    slug:"",
                    wageType:"0",
                    description:"",
                    category:"",
                    minWage:"",
                    maxWage:"",
                    jobPosition:"",
                    slug:"",
                    categorySearch:"",
                    loading:false

                }
            },
            methods: {

                show(offer){
              
                    this.image = offer.user.image
                    this.title = offer.title
                    this.category = offer.category.name
                    this.description = offer.description
                    this.minWage = offer.min_wage
                    this.wageType = offer.wage_type
                    this.jobPosition = offer.job_position
                    this.slug = offer.slug
                },
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
                async query(page = 1){
                    this.page = page
                    this.loading = true
                    let offersRes = await axios.post("{{ url('/search') }}", {search: this.jobSearch, region: this.regionSearch, category: this.category, business: this.business, page: this.page})
                    this.loading = false
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
                this.categorySearch = localStorage.getItem("encontre_trabajo_category_search")
                this.query()
                
            }

        })
    </script>

@endpush