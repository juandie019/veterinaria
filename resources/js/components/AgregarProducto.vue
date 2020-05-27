<template>
    <div id="app">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div  @submit.prevent = "buscarProducto()">
                                <div class="row">
                                    <div class ="col-md-3 form-inline text-primary">
                                        <div class="text-left">Folio:</div>
                                       <div v-text="folio" class="text-right"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" v-model="id_producto" class="form-control" name="id_producto"  required autocomplete="id_producto" autofocus placeholder="Id de producto">
                                    </div>
                                    <div class="col-md-3">
                                        <input id="cantidad" v-model="cantidad" type="text" class="form-control" name="cantidad"  required autocomplete="cantidad" autofocus placeholder="Cantidad de productos">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-primary form-control"  value = "Agregar producto" @click = "buscarProducto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id producto</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr v-for="(producto, index) in productos" :key="index">
                                    <td>{{producto['id_producto']}}</td>
                                    <td>{{producto['nombre']}}</td>
                                    <td>{{producto['precio']}}</td>
                                    <td>{{producto['cantidad']}}</td>
                                    <td>{{producto['total']}}</td>
                                    <td>
                                           <button style="float: right" class="btn btn-secondary button-small mr-0">-</button>
                                    </td>
                                     <td>
                                           <button style="float: rigth" class="btn btn-secondary button-small ml-0">+</button>
                                    </td>
                                </tr>
                                <tr class="table-info">
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <th>{{this.total_productos}}</th>
                                    <th>{{this.total}}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" v-model="id_cliente" class="form-control" name="id_cliente" required autocomplete="id_cliente" autofocus placeholder="Id de Cliente">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary form-control" @click="buscarCliente">
                                          Aplicar Cupon
                                        </button>
                                    </div>
                                    <div class="col-md-2 offset-md-6">
                                        <input type="submit" class="btn btn-primary form-control" @click = "registrarVenta" value="Finalizar Venta">
                                    </div>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//no alcance a terminar los botones mas menos :(
    export default {

        props: ['folioAux'],

        data(){
            return{
                id_producto: '',
                cantidad: '1',
                total: 0,
                total_productos: 0,
                productos: [],
                id_cliente: '',
                id_cliente_real: '',
                folio: ''
            }
        },


        mounted() {
            console.log('Component mounted.')
            this.folio = this.folioAux;
        },

        methods: {
          buscarProducto(){
            console.log(this.id_producto + " " + this.cantidad);

             axios.post('/api/producto/' + this.id_producto,{cantidad:this.cantidad})
             .then(response => {
                   //console.log(response.data['noSuficiente'])

                    if(response.data['noFound']){
                        swal("No se encontro el producto", "ID: " + this.id_producto, "error");
                        this.id_producto = '';
                    }else if(response.data['noSuficiente']){
                        swal("No suficiente en stock", "Cantidad disponible: " + response.data['cantidad'], "error");
                        this.cantidad = '1';
                    }
                    else{
                        this.productos.push({
                            id_producto: response.data['id_producto'],
                            nombre: response.data['nombre'],
                            precio: response.data['precio'],
                            cantidad: this.cantidad,
                            total: response.data['precio'] * this.cantidad
                        })
                        this.id_producto = '';
                        this.total += response.data['precio'] * this.cantidad;
                        this.total_productos += parseInt(this.cantidad);
                    }
                })
             .catch(function (error){
               console.log(error);
             })
          },

          registrarVenta(){
              axios.post('/api/venta/store',
              {data:{lista:this.productos, id_cliente:this.id_cliente_real,
               cantidad:this.total_productos, total:this.total, folio:this.folio}
              })
              .then(response => {
                  //recuperar errores
                  swal("Venta registrada", "Con Exito", "success");

                  this.folio = response.data;
                  this.productos = [];
                  this.cliente = '';
                  this.cantidad = '1';
                  this.total_productos = 0;
                  this.total = 0;
                  this.id_producto = '';
                  this.cupon = false
               })
          },

          buscarCliente(){
              axios.post('/api/cliente/' + this.id_cliente)
              .then(response=>{
                 // console.log(response.data);
                  this.id_cliente_real = this.id_cliente;

                  if(response.data['noFound']){
                      this.id_cliente_real = '';
                      swal("No se encontro el cliente", this.id_cliente , "error");
                  }
                  else if(response.data['cupon']){
                      swal("Se aplico un cupon","", "success");
                      this.cupon = true;
                      this.total -= this.total * .10
                  }
                  else swal("No hay cupones",);
              })
          }
        }

    }
</script>
