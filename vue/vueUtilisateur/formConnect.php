<!-- Formulaire de connexion -->
<div class="form-group">

    <form action='index.php?ctl=utilisateur&action=validConnect' method='post'>

      <div class="container w-25 pt-5">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse E-Mail</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Connexion</button>

    </form>
</div>
</form>
</div>
