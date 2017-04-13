# VIM MySQL Suggestions

## About
A plugin of VIM to show suggestions from MySQL database structure.

## Demo
![alt tag](https://raw.githubusercontent.com/borissov/vim-mysql-suggestions/master/images/preview_1.gif)

## Installation
Via Plugin Manager

### Vundle
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

### Requirements
* `PHP 5+` 
* `VIM 7.3+` 

## Usage

### Default mappings

The following key mappings are provided by default: 
* `<C-x><C-u>` Call user completion function 
* `<C-x>` Show completion menu
