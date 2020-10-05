<div class="container">
    <div class="card m-4 mx-auto" style="width: 18rem;">
        <div class="card-body">
       
            <form class="card-form" action="guardar" method="POST" id="guardar">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Escribe tu nombre">
                </div>

                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" name="surname" class="form-control" id="surname" aria-describedby="emailHelp" placeholder="Escribe tu apellido">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribe tu email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword2">Contraseña</label>
                    <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Confirma tu contraseña">
                </div>
                
                <button type="submit" class="btn btn-primary">Regístrate</button>
            </form>
        
        </div>
    </div>
</div>
