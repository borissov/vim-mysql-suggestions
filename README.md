#vim-mysql-suggestions
A plugin of VIM to show suggestion from MySQL database.

##About

##Installation
Via Plugin Manager
###Vundle
```viml
    Plugin 'borissov/vim-mysql-suggestions'
```

In your vimrc file add options.
```viml
    " File Types you want to use suggestions
    autocmd FileType php setlocal completefunc=MySQLCompleteFunction
    autocmd FileType javascript setlocal completefunc=MySQLCompleteFunction
    let g:database_host = "MySQL Host"
    let g:database_password = "MySQL Password"
    let g:database_database = "MySQL Database Name"
    let g:database_user = "MySQL User"
```

