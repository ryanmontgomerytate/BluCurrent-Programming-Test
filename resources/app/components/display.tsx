import { Button } from '@mui/material'
import React, { useState } from 'react'
import { fetchCivilizationsData } from '../fetch/fetchCivilizationsData'
import { Civilization } from '../types/civilizations'
import { Table } from './table'

export const Display: React.FC = () => {
  const [civData, setCivData] = useState<Civilization[]>([])
  const callFetch = async () => {
    const civDataReturned = await fetchCivilizationsData()
    setCivData(civDataReturned)
  }

  return (
    <div>
      <Button variant="contained" size="large" onClick={callFetch}>
        Get Civilizations
      </Button>
      {civData && <Table civData={civData} setCivData={setCivData} />}
    </div>
  )
}
