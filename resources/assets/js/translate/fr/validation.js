export default {
    'accepted'             : 'Le champ doit être accepté.',
    'active_url'           : "Le champ n'est pas une URL valide.",
    'after'                : 'Le champ doit être une date postérieure au :date.',
    'after_or_equal'       : 'Le champ doit être une date postérieure ou égale au :date.',
    'alpha'                : 'Le champ doit seulement contenir des lettres.',
    'alpha_dash'           : 'Le champ doit seulement contenir des lettres, des chiffres et des tirets.',
    'alpha_num'            : 'Le champ doit seulement contenir des chiffres et des lettres.',
    'array'                : 'Le champ doit être un tableau.',
    'before'               : 'Le champ doit être une date antérieure au :date.',
    'before_or_equal'      : 'Le champ doit être une date antérieure ou égale au :date.',
    'between': {
      'numeric': 'La valeur de doit être comprise entre :min et :max.',
      'file': 'La taille du fichier de doit être comprise entre :min et :max kilo-octets.',
      'string': 'Le texte doit contenir entre :min et :max caractères.',
      'array': 'Le tableau doit contenir entre :min et :max éléments.',
    },
    'boolean'              : 'Le champ doit être vrai ou faux.',
    'confirmed'            : 'Le champ de confirmation ne correspond pas.',
    'date'                 : "Le champ n'est pas une date valide.",
    'date_format'          : 'Le champ ne correspond pas au format :format.',
    'different'            : 'Les champs et :other doivent être différents.',
    'digits'               : 'Le champ doit contenir :digits chiffres.',
    'digits_between'       : 'Le champ doit contenir entre :min et :max chiffres.',
    'dimensions'           : "La taille de l'image n'est pas conforme.",
    'distinct'             : 'Le champ a une valeur dupliquée.',
    'email'                : 'Le champ doit être une adresse e-mail valide.',
    'exists'               : 'Le champ sélectionné est invalide.',
    'file'                 : 'Le champ doit être un fichier.',
    'filled'               : 'Le champ est obligatoire.',
    'image'                : 'Le champ doit être une image.',
    'in'                   : 'Le champ est invalide.',
    'in_array'             : 'Le champ n\'existe pas dans :other.',
    'integer'              : 'Le champ doit être un entier.',
    'ip'                   : 'Le champ doit être une adresse IP valide.',
    'ipv4'                 : 'Le champ doit être une adresse IPv4 valide.',
    'ipv6'                 : 'Le champ doit être une adresse IPv6 valide.',
    'json'                 : 'Le champ doit être un document JSON valide.',
    'max'                  : {
      'numeric': 'La valeur de ne peut être supérieure à :max.',
      'file': 'La taille du fichier de ne peut pas dépasser :max kilo-octets.',
      'string': 'Le texte de ne peut contenir plus de :max caractères.',
      'array': 'Le tableau ne peut contenir plus de :max éléments.',
    },
    'mimes'                : 'Le champ doit être un fichier de type : :values.',
    'mimetypes'            : 'Le champ doit être un fichier de type : :values.',
    'min'                  : {
        'numeric' : 'La valeur de doit être supérieure ou égale à :min.',
        'file'    : 'La taille du fichier de doit être supérieure à :min kilo-octets.',
        'string'  : 'Le texte doit contenir au moins :min caractères.',
        'array'   : 'Le tableau doit contenir au moins :min éléments.',
    },
    'not_in'               : "Le champ sélectionné n'est pas valide.",
    'numeric'              : 'Le champ doit contenir un nombre.',
    'present'              : 'Le champ doit être présent.',
    'regex'                : 'Le format du champ est invalide.',
    'required'             : 'Le champ est obligatoire.',
    'required_if'          : 'Le champ est obligatoire quand la valeur de :other est :value.',
    'required_unless'      : 'Le champ est obligatoire sauf si :other est :values.',
    'required_with'        : 'Le champ est obligatoire quand :values est présent.',
    'required_with_all'    : 'Le champ est obligatoire quand :values est présent.',
    'required_without'     : "Le champ est obligatoire quand :values n'est pas présent.",
    'required_without_all' : "Le champ est requis quand aucun de :values n'est présent.",
    'same'                 : 'Les champs et :other doivent être identiques.',
    'size'                 : {
        'numeric' : 'La valeur de doit être :size.',
        'file'    : 'La taille du fichier de doit être de :size kilo-octets.',
        'string'  : 'Le texte de doit contenir :size caractères.',
        'array'   : 'Le tableau doit contenir :size éléments.',
    },
    'string'               : 'Le champ doit être une chaîne de caractères.',
    'timezone'             : 'Le champ doit être un fuseau horaire valide.',
    'unique'               : 'La valeur du champ est déjà utilisée.',
    'uploaded'             : "Le fichier du champ n'a pu être téléchargé.",
    'url'                  : "Le format de l'URL de n'est pas valide.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               : {
        'attribute-name' : {
            'rule-name' : 'custom-message',
        },
    },

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           : {
        'name'                  : 'nom',
        'username'              : 'nom d\'utilisateur',
        'email'                 : 'adresse e-mail',
        'first_name'            : 'prénom',
        'last_name'             : 'nom',
        'password'              : 'mot de passe',
        'password_confirmation' : 'confirmation du mot de passe',
        'city'                  : 'ville',
        'country'               : 'pays',
        'address'               : 'adresse',
        'phone'                 : 'téléphone',
        'mobile'                : 'portable',
        'age'                   : 'âge',
        'sex'                   : 'sexe',
        'gender'                : 'genre',
        'day'                   : 'jour',
        'month'                 : 'mois',
        'year'                  : 'année',
        'hour'                  : 'heure',
        'minute'                : 'minute',
        'second'                : 'seconde',
        'title'                 : 'titre',
        'content'               : 'contenu',
        'description'           : 'description',
        'excerpt'               : 'extrait',
        'date'                  : 'date',
        'time'                  : 'heure',
        'available'             : 'disponible',
        'size'                  : 'taille',
    },

}
