# VIM MySQL Suggestions

## About
A plugin of VIM to show suggestions from MySQL database structure.
## Demo
![alt tag](https://raw.githubusercontent.com/borissov/vim-mysql-suggestions/master/images/preview_1.gif)
## Installation
Via Plugin Manager
#### Vundle
```viml
    Plugin 'borissov/vim-mysql-suggestions'
```
#### VIM Plug 
```viml
    Plug 'borissov/vim-mysql-suggestions'
```
### Manual Installation
```bash
cd ~/.vim/bundle
git clone git://github.com/borissov/vim-mysql-suggestions
```
## Settings
In your vimrc file add options.
```viml
    " File Types you want to use suggestions
    autocmd FileType php setlocal completefunc=MySQLCompleteFunction
    autocmd FileType javascript setlocal completefunc=MySQLCompleteFunction
    " Be careful and don't publish in Github 
    let g:database_host = "MySQL Host"
    let g:database_password = "MySQL Password"
    let g:database_database = "MySQL Database Name"
    let g:database_user = "MySQL User"
```
## Requirements
* `VIM 7.3+` 
* `PHP CLI 5+` 
## Usage
### Default mappings
The following key mappings are provided by default: 
* `<C-x><C-u>` Call user completion function 
* `<C-x>` Show completion menu
## Feedback 
If you have any comments or questions about specific problems relating to this plugin, please do not hesitate to contact me. Tested on Vim, NeoVim, MacVim, gVim. Not support Windows versions.
