<?php
/* Copyright (C) 2007 Patrick Raguin  <patrick.raguin@gmail.com>
 * Copyright (C) 2010 Regis Houssin   <regis@dolibarr.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * or see http://www.gnu.org/
 */

/**
 *      \file       htdocs/droitpret/modules_droipret.php
 *      \ingroup    droitpret
 *      \brief      Fichier contenant la classe mere de generation des exports de droits de prets
 *      \version    $Id: modules_droitpret.php,v 1.5 2010/09/23 17:12:05 cdelambert Exp $
 */


/**
 *  \class      ModeleDroitPret
 *  \brief      Classe mere des modeles de format d'export de droits de prets
 */

class ModeleDroitPret
{


    /**
     *      \brief      Constructeur
     */
    function ModeleDroitPret()
    {
    }

    /**
     *      \brief      Charge en memoire et renvoie la liste des modeles actifs
     *      \param      db      Handler de base
     */
    function liste_rapport($db)
    {

        $liste=array();
        $sql ="SELECT rowid, fichier";
        $sql.=" FROM ".MAIN_DB_PREFIX."droitpret_rapport";

		$resql = $db->query($sql);
		if ($resql)
		{
			$num = $db->num_rows($resql);
			$i = 0;
			while ($i < $num)
			{
				$row = $db->fetch_row($resql);
				$liste[$row[0]]=$row[1];
				$i++;
			}
		}
		else
		{
			dol_print_error($db);
			return -1;
		}

        return $liste;
    }
    
}

?>