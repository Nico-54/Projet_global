from flask import Flask, render_template
from flask_debugtoolbar import DebugToolbarExtension
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config.from_pyfile('config.py')
db = SQLAlchemy(app)

app.debug= True
DebugToolbarExtension(app)

#
from views import equides, transports
app.register_blueprint(equides)
app.register_blueprint(transports)




@app.route("/")
def hello_world():
    return render_template("base.html")