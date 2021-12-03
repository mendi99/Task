<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <title>View Products | Product Store</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            <form method="POST" action="/task">
	            {{ csrf_field() }}
                    <h1> Enter Details to create a task</h1>
                    <div class="form-input">
                        <label>Name</label> <input type="text" name="name">
                    </div>
                    <button type="submit">Submit</button>
                </form>
                <h1>Here's a list of available tasks</h1>
                
            </div>
        </div>
    </body>
    </html>
