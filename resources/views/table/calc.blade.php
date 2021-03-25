<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<label for="thickness" class="col-md-5 col-form-label text-md-right">Толщина</label>

<div class="col-md-6">
    <input id="thickness" type="text" class="form-control" name="thickness">
</div>

<label for="area" class="col-md-5 col-form-label text-md-right">Площадь</label>

<div class="col-md-6">
    <input id="area" type="text" class="form-control" name="area">
</div>

<p>
    <select size="1" name="hero" id="hero">
        <option disabled></option>
        <option value="7.84">7.84</option>
        <option value="7.74">7.74</option>
    </select>
</p>

<p id="sum">

</p>

<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary" id="butt">
        Register
    </button>
</div>
<script src="js/jQuery.js"></script>
<script src="/calc/calc.js"></script>
</body>
</html>
