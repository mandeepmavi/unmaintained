<?php
/* Copyright (C) 2009 Laurent Destailleur         <eldy@users.sourceforge.net>
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
 *	\file			htdocs/lib/functionsnumberswords.lib.php
 *	\brief			A set of functions for Dolibarr
 *					This file contains functions for plugin numberwords.
 *	\version		$Id: functions_numberwords.lib.php,v 1.1 2009/08/25 20:50:39 eldy Exp $
 */


/**
 * 		\brief		Function called to complete subsitution array
 * 					functions xxx_completesubstitutionarray are called by make_substitutions()
 */
function numberwords_completesubstitutionarray(&$substitutionarray,&$langs,&$object)
{
	global $conf;
	$numbertext=$langs->getLabelFromNumber($object->total_ttc,1,$conf->monnaie);
	$substitutionarray['__TOTAL_TTC_WORDS__']=$numbertext;
}

/**
 *      \brief      Return full text translated to languagea label for a key. Store key-label in a cache.
 *		\number		number		Number to encode in full text
 * 		\param		isamount	1=It's an amount, 0=it's just a number
 *      \return     string		Label translated in UTF8 (but without entities)
 * 								10 if setDefaultLang was en_US => ten
 * 								123 if setDefaultLang was fr_FR => cent vingt trois
 */
function numberwords_getLabelFromNumber($langs,$number,$isamount=0)
{
	dol_syslog("numberwords_getLabelFromNumber langs->defaultlang=".$langs->defaultlang." number=".$number." isamount=".$isamount);
	$outlang=$langs->defaultlang;	// Output language we want
	$outlangarray=split('_',$outlang,2);
	// If lang is xx_XX, then we use xx
	if (strtolower($outlangarray[0]) == strtolower($outlangarray[1])) $outlang=$outlangarray[0];

	$numberwords=$number;

	require_once(dirname(__FILE__).'/../../Numbers/Words.php');
	$handle = new Numbers_Words();
	$handle->dir=dirname(__FILE__).'/../../';
	if ($isamount) $numberwords=$handle->toCurrency($number, $outlang);
	else $numberwords=$handle->toWords($number, $outlang);

	if (empty($handle->error)) return $numberwords;
	else return $handle->error;
}
