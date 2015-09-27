<?php 


$this->title = 'Handlebars Statuses';
?>
<div class="row">
    <div class="col-sm-12">
        <h1>Statuses</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div id="list-statuses">
            <script type="text/x-handlebars-template" id="list-statuses-tpl">
                <div id="block-list-statuses">
                    {{#each .}}
                        <article>
                            <h2>{{ name }}, status is <span>{{ is_active }}</span> <button class="btn btn-succces delete-status" data-id="{{ id }}">X</button></h2>
                        </article>
                    {{/each}}
                </div>
            </script>
        </div>
    </div>
    <div class="col-sm-6">
        <form action="" class="form-group" id="create-status-form">
            <div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_active" id="is_active" checked="checked">Active
                    </label>   
                </div>
                <button type="submit" class="btn btn-default">Create Status</button>
            </div>
        </form>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/vendor/handlebars-v4.0.2.js"></script>
<script src="/js/handlebars/statuses.js"></script>
