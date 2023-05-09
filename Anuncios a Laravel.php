<?php 

Transcribir el siguiente codigo a  PHP 5.6.40  Laravel 5.4  composer 2.0.011  

                        <td class="style24">
                            Seleccione Col:&nbsp;&nbsp;&nbsp;
                            <asp:DropDownList ID="ddlCol" runat="server" AutoPostBack="True" CssClass="ddl" 
                                DataSourceID="SDSDDLCol" DataTextField="nomcol" DataValueField="colonia" 
                                Font-Names="Verdana" Font-Size="X-Small" Height="17px" 
                                onselectedindexchanged="ddlCol_SelectedIndexChanged" Width="287px">
                            </asp:DropDownList>
                        </td>

<td class="style24">
    Seleccione Col:&nbsp;&nbsp;&nbsp;
    <select id="ddlCol" class="ddl" onchange="this.form.submit()">
        <option value=""></option>
        @foreach ($colonias as $colonia)
            <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
        @endforeach
    </select>
</td>

==========================================================================================================================================================
20230413

CREATE TABLE `posts` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `post_date` date,
    `status` varchar(20) DEFAULT 'Pending',
    `title` varchar(100) unsigned NOT NULL,
    `description` text
);


CREATE TABLE `dbo`.`anunmdua`(
	`dua` char(6) NOT NULL,
	`nomdua` char(60) NULL,
	`domdua` char(40) NULL,
	`colonia` char(6) NULL,
	`ciudad` char(40) NULL,
	`prop` char(40) NULL,
	`telprop` char(20) NULL,
	`rep_legal` char(40) NULL,
	`rfc_dua` char(20) NULL,
	`seguro` char(2) NULL,
	`fechaini` char(8) NULL,
	`fechafin` char(8) NULL,
	`fbajax` char(8) NULL
)
 
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunmduaTable extends Migration
{
    public function up()
    {
        Schema::create('anunmdua', function (Blueprint $table) {

		$table->char('dua',6);
		$table->char('nomdua',60)->nullable();
		$table->char('domdua',40)->nullable();
		$table->char('colonia',6)->nullable();
		$table->char('ciudad',40)->nullable();
		$table->char('prop',40)->nullable();
		$table->char('telprop',20)->nullable();
		$table->char('rep_legal',40)->nullable();
		$table->char('rfc_dua',20)->nullable();
		$table->char('seguro',2)->nullable();
		$table->char('fechaini',8)->nullable();
		$table->char('fechafin',8)->nullable();
		$table->char('fbajax',8)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('anunmdua');
    }
}
//---------------------------------------------------------------------------------------------------------
