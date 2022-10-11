<?php

return [

    'accepted'             => ':attribute qəbul edilməlidir',
    'active_url'           => ':attribute doğru URL deyil',
    'after'                => ':attribute :date tarixindən sonra olmalıdır',
    'after_or_equal'       => ':attribute :date tarixi ilə eyni və ya sonra olmalıdır',
    'alpha'                => ':attribute yalnız hərflərdən ibarət ola bilər',
    'alpha_dash'           => ':attribute yalnız hərf, rəqəm və tire simvolundan ibarət ola bilər',
    'alpha_num'            => ':attribute yalnız hərf və rəqəmlərdən ibarət ola bilər',
    'array'                => ':attribute massiv formatında olmalıdır',
    'before'               => ':attribute :date tarixindən əvvəl olmalıdır',
    'before_or_equal'      => ':attribute :date tarixindən əvvəl və ya bərabər olmalıdır',
    'between'              => [
        'numeric' => ':attribute :min ilə :max arasında olmalıdır',
        'file'    => ':attribute :min ilə :max KB ölçüsü intervalında olmalıdır',
        'string'  => ':attribute :min ilə :max simvolu intervalında olmalıdır',
        'array'   => ':attribute :min ilə :max intervalında hissədən ibarət olmalıdır',
    ],
    'boolean'              => ' :attribute doğru və ya yanlış ola bilər',
    'confirmed'            => ' :attribute doğrulanması yanlışdır',
    'date'                 => ' :attribute tarix formatında olmalıdır',
    'date_format'          => ' :attribute :format formatında olmalıdır',
    'different'            => ' :attribute və :other fərqli olmalıdır',
    'digits'               => ' :attribute :digits rəqəmli olmalıdır',
    'digits_between'       => ' :attribute :min ilə :max rəqəmləri intervalında olmalıdır',
    'dimensions'           => ' :attribute doğru şəkil ölçülərində deyil',
    'distinct'             => ' :attribute dublikat qiymətlidir',
    'email'                => ' :attribute doğru email formatında deyil',
    'exists'               => ' seçilmiş :attribute yanlışdır',
    'file'                 => ' :attribute fayl formatında olmalıdır',
    'filled'               => ' :attribute qiyməti olmalıdır',
    'image'                => ' :attribute şəkil formatında olmalıdır',
    'in'                   => ' seçilmiş :attribute yanlışdır',
    'in_array'             => ' :attribute :other qiymətləri arasında olmalıdır',
    'integer'              => ' :attribute tam ədəd olmalıdır',
    'ip'                   => ' :attribute İP adres formatında olmalıdır',
    'ipv4'                 => ' :attribute İPv4 adres formatında olmalıdır',
    'ipv6'                 => ' :attribute İPv6 adres formatında olmalıdır',
    'json'                 => ' :attribute JSON formatında olmalıdır',
    'max'                  => [
        'numeric' => ' :attribute maksiumum :max rəqəmdən ibarət ola bilər',
        'file'    => ' :attribute maksimum :max KB ölçüsündə ola bilər',
        'string'  => ' :attribute maksimum :max simvoldan ibarət ola bilər',
        'array'   => ' :attribute maksimum :max hədd\'dən ibarət ola bilər',
    ],
    'mimes'                => ' :attribute :values tipində fayl olmalıdır',
    'mimetypes'            => ' :attribute :values tipində fayl olmalıdır',
    'min'                  => [
        'numeric' => ' :attribute minimum :min rəqəmdən ibarət ola bilər',
        'file'    => ' :attribute minimum :min KB ölçüsündə ola bilər',
        'string'  => ' :attribute minimum :min simvoldan ibarət ola bilər',
        'array'   => ' :attribute minimum :min hədd\'dən ibarət ola bilər',
    ],
    'not_in'               => ' seçilmiş :attribute yanlışdır',
    'numeric'              => ' :attribute rəqəmlərdən ibarət olmalıdır',
    'present'              => ' :attribute iştirak etməlidir',
    'regex'                => ' :attribute formatı yanlışdır',
    'required'             => ' :attribute mütləqdir',
    'required_if'          => ' :attribute (:other :value ikən) mütləqdir',
    'required_unless'      => ' :attribute (:other :values \'ə daxil ikən) mütləqdir',
    'required_with'        => ' :attribute (:values var ikən) mütləqdir',
    'required_with_all'    => ' :attribute (:values var ikən) mütləqdir',
    'required_without'     => ' :attribute (:values yox ikən) mütləqdir',
    'required_without_all' => ' :attribute (:values yox ikən) mütləqdir',
    'same'                 => ' :attribute və :other eyni olmalıdır',
    'size'                 => [
        'numeric' => ' :attribute :size ölçüsündə olmalıdır',
        'file'    => ' :attribute :size KB ölçüsündə olmalıdır',
        'string'  => ' :attribute :size simvoldan ibarət olmalıdır',
        'array'   => ' :attribute :size hədd\'dən ibarət olmalıdır',
    ],
    'string'               => ' :attribute hərf formatında olmalıdır',
    'timezone'             => ' :attribute ərazi formatında olmalıdır',
    'unique'               => ' :attribute artıq iştirak edib',
    'uploaded'             => ' :attribute yüklənməsi mümkün olmadı',
    'url'                  => ' :attribute formatı yanlışdır',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    |  following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */


    'attributes' => [
        'image'       => 'Şəkil',
        'category_id' => 'Kateqoriya',
        'product_id' => 'Məhsul',
        'expired_at' => 'Vaxtın bitmə tarixi',
        'discount_price' => 'Endirim qiyməti',
        'name'        => 'Ad',
        'page_title:az'     => 'Azərbaycan dilində Səhifə başlığı',
        'page_title:en'     => 'İngilis dilində Səhifə başlığı',
        'page_title:ru'     => 'Rus dilində Səhifə başlığı',
        'note:az'     => 'Azərbaycan dilində Qeyd',
        'note:en'     => 'İngilis dilində Qeyd',
        'note:ru'     => 'Rus dilində Qeyd',
        'name:az'     => 'Azərbaycan dilində Ad',
        'name:en'     => 'İngilis dilində Ad',
        'name:ru'     => 'Rus dilində Ad',
        'slug:az'     => 'Azərbaycan dilində Slug',
        'slug:en'     => 'İngilis dilində Slug',
        'slug:ru'     => 'Rus dilində Slug',
        'title:az'     => 'Azərbaycan dilində Başlıq',
        'title:en'     => 'İngilis dilində Başlıq',
        'title:ru'     => 'Rus dilində Başlıq',
        'keywords:az'     => 'Azərbaycan dilində Açar sözlər',
        'keywords:en'     => 'İngilis dilində Açar sözlər',
        'keywords:ru'     => 'Rus dilində Açar sözlər',
        'description:az'     => 'Azərbaycan dilində Açıqlama',
        'description:en'     => 'İngilis dilində Açıqlama',
        'description:ru'     => 'Rus dilində Açıqlama',
        'text:az'     => 'Azərbaycan dilində Mətn',
        'text:en'     => 'İngilis dilində Mətn',
        'text:ru'     => 'Rus dilində Mətn',
        'password'    => 'Şifrə',
        'email'       => 'Elektron poçt ünvanı',
        'slug'        => 'Link adı',
        'role_id' => 'Rol',
        'permissions' => 'İcazələr',
        'products' => 'Məhsullar',
        'colors' => 'Rənglər',
        'first_name' => 'Ad',
        'last_name' => 'Soyad',
        'phone' => 'Telefon',
        'delivery_method_id' => 'Çatdırılma metodu',
        'payment_method_id' => 'Ödəmə metodu',
        'payment_card_month_id' => 'Ödəmə kartı ayı',
        'more_info' => 'Əlavə məlumat',
        'initial_price' => 'İlkin ödəniş',
        'month' => 'Ay',
        'installment_card_id' => 'Taksi kartı',
        'district_id' => 'Təhvil alacağınız mağaza',
        'address' => 'Ünvan',
        'credit_month_id' => 'Kredit kartı ayı',
        'installment_card_month_id' => 'Taksit kartı ayı',
    ],

];
