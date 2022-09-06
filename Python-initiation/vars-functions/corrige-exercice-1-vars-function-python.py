#exercice 1
user = "John Doe"
id = 7

#exercice 2
print(user)
print(id)

#exercice 3
print(type(user))#<class 'str'>

print(type(id))#<class 'int'>

#exercice 4
#del(user)

#print(user)
#Traceback (most recent call last):
#  File "<stdin>", line 1, in <module>
#NameError: name 'user' is not defined. Did you mean: 'super'?


#exercice 5
def hello_iam():
    """
    Affiche "Hello, I am <user>"
    """
    name = user
    #fait référence à la variable globale user,
    #définie en-dehors de la fonction
    print("Hello, I am "+name)
    
hello_iam()

#remplacement de la valeur par interpolation
# def hello_iam_v2():
#     """
#     Affiche "Hello, I am <user>"
#     """
#     name = user
#     print(f"Hello, I am {name}")
    

#exercice 6
def hello_you(someone):
    """
    Affiche "Hello <someone>"
    """
    print("Hello "+someone)
    
hello_you("Hal9000")

#exercice 7
#permet d'expérimenter la portée des variables (current_index)
#attention, il faut éviter d'utiliser le même nom de variable
#à l'intérieur et à l'extérieur de la fonction (ici current_index)
def get_new_id(current_index=None):
    """
    Simule la création d'id de façon incrémentale
    """
    if current_index is None:
        return 1
    else:
        #attention, il faudrait vérifier la valeur de current_index (type et la valeur)
        return current_index+1

current_index = get_new_id()#1
#id_1 = get_new_id()#1
print(current_index)#1

#attention, il ne faudrait pas ré-utiliser la variable
# précédemment créée mais en créer une nouvelle
current_index = get_new_id(current_index)#2 <--- ne pas faire ça ! c'est mal, c'est fait pour illustrer la portée des variables
#id_2 = get_new_id(id_1)#2
print(current_index)

#exercice 8
def create_user(name):
    """
    Créé un utilisateur sous forme de dictionary
    """
    user_id = get_new_id(current_index)#3
    
    return {"id":user_id,"username":name}

a_user = create_user("John Doe")
print(a_user)

#exercice 9
def add(num1,num2):
    """
    Additionne deux nombres
    """
    return num1+num2

result = add(1,1)
print(result)#2

#exercice 10
def sum(*nums)->int:
    """
    Additionne un nombre arbitraire de paramètres fournis
    """
    sum_result = 0
    for num in nums:
        sum_result+=num
        #sum_result+=int(num)#il serait préférable de convertir en int chaque paramètre

    return sum_result

sum_result = sum(1,2,3,4,5,6,7,8,9)
print(sum_result)#45

#exercice 11
def increment_by(n):
    """
    Incrémente une valeur
    """
    return lambda x : x+n

increment_by_one = increment_by(1)

new_id_incremented_by_one = increment_by_one(2)
print(new_id_incremented_by_one)#3

increment_by_ten = increment_by(10)

new_id_incremented_by_ten = increment_by_ten(2)
print(new_id_incremented_by_ten)#12
